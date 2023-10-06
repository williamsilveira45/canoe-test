const kafka = require('kafka-node');
const axios = require('axios');

const client = new kafka.KafkaClient({ kafkaHost: 'kafka:9093' });

const admin = new kafka.Admin(client);

const topicsToCreate = [{
    topic: 'duplicate_fund_warning',
    partitions: 1,
    replicationFactor: 1,
}];

admin.createTopics(topicsToCreate, (err, res) => {
    if(err) {
        console.error('Error creating topic:', err);
    } else {
        console.log('Topic created (or already exists)');

        const consumer = new kafka.Consumer(
            client,
            [
                { topic: 'duplicate_fund_warning', partition: 0 }
            ],
            {
                autoCommit: true
            }
        );

        consumer.on('message', async function (message) {
            /**
             * This process is just a representation of what you can do with the message, so I didnt focus here.
             */
            try {
                const fund_id = message.value;

                const response = await axios.post('http://nginx/api/funds/duplicated', {fund_id: fund_id});

            } catch (error) {
                console.error('Error making POST request:', error);
            }
        });

        consumer.on('error', function (err) {
            console.error('Error:', err);
        });

        process.on('SIGINT', function () {
            consumer.close(true, function () {
                process.exit();
            });
        });
    }
});
