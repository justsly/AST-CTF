#!/bin/bash
if [ $# -lt 2 ]; then
  echo "usage: $0 vm_name interface"
  echo "vm_name - Name of your Virtual Machine"
  echo "interface - Name of the Interface which is connected to the CTF Network and you want to bridge into your VM"
else
  vm_name=$1
  bridge_if=$2
  for i in {1..8}
  do
    echo "VBoxManage modifyvm $vm_name --nic$i bridged"
    echo "VBoxManage modifyvm $vm_name --bridgeadapter$i $bridge_if"
  done
fi
