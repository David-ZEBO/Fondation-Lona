#!/bin/bash
# Double-cliquez sur ce fichier pour lancer la démo du site dans votre navigateur.
cd "$(dirname "$0")/.."
( sleep 1; open "http://127.0.0.1:8781/demo/site.html" ) &
python3 demo/serveur.py
