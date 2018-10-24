FROM debian:stretch


ADD provisioning /vagrant/provisioning


#installation de ANSIBLE
RUN apt-get update && \
 apt-get install -y ansible

RUN echo "[docker]" >> /etc/ansible/hosts
RUN echo "docker ansible_connection=local" >> /etc/ansible/hosts


RUN ansible-playbook /vagrant/provisioning/sample-playbook.yml --extra-vars "environnement=docker"