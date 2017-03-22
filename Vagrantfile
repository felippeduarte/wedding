# -*- mode: ruby -*-
# vi: set ft=ruby :
Vagrant.configure('2') do |config|
  config.vm.box      = 'ubuntu/yakkety64'
  config.vm.network :forwarded_port, guest: 80, host: 8000
  config.vm.provision "shell", inline: $script
  config.vm.synced_folder "./public_html", "/var/www/html"
  
  config.vm.provider 'virtualbox' do |v|
    v.memory = 2048
    v.cpus = 2
  end
end
