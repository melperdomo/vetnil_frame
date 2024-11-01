FROM rabbitmq:4

RUN apt update -y
RUN apt upgrade -y
RUN apt install sudo nano -y

RUN rabbitmq-plugins enable rabbitmq_management

ENV RABBITMQ_DEFAULT_USER=admin
ENV RABBITMQ_DEFAULT_PASS=admin
ENV RABBITMQ_DEFAULT_VHOST=/

EXPOSE 5672 15672
WORKDIR /etc/rabbitmq