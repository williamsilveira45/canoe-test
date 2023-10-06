FROM confluentinc/cp-kafka:latest

USER root

COPY ./start.sh /start.sh
RUN chmod +x /start.sh

ENTRYPOINT ["/start.sh"]
