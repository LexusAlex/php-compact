site:
	ansible-playbook -i hosts.yml site.yml
upgrade:
	ansible-playbook -i hosts.yml upgrade.yml
ping:
	ansible web -m ping -i hosts.yml
ping-server1:
	ansible server1 -m ping -i hosts.yml
info:
	ansible server1 -m setup -i hosts.yml
arch:
	ansible all -a "uname -a" -i hosts.yml
