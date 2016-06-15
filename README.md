# AST-CTF
Hacking Stuff für den AST Tag

Install:

1. Automatisches bauen aller Container durch starten von "build_all_container.sh"
  - Das Skript sucht automatisch in der darunterliegenden Ordnerstruktur nach Dateien mit dem Namen "Dockerfile". Der erstellte Container wird mit dem Namen des Ordners in dem das Dockerfile gefunden wurde und einem vorangestellten "ast/" getagged.

2. Um alle 8 Netzwerkinterfaces der Virtuellen Maschine zu aktivieren das Skript "bridge_all_nics.sh" ausführen.
