#!/bin/bash

#sleep 15
#kafka-topics --create --topic duplicate_fund_warning --bootstrap-server localhost:9092 --partitions 1 --replication-factor 1

# Inicializa o Zookeeper primeiro (considerando que o Kafka e o Zookeeper estão no mesmo container)
zookeeper-server-start.sh /etc/kafka/zookeeper.properties &

# Aguarda alguns segundos para garantir que o Zookeeper esteja totalmente inicializado
sleep 10

# Inicializa o Kafka
kafka-server-start.sh /etc/kafka/server.properties
