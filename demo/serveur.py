"""Serveur local de démonstration du thème Fondation LONA.

Usage : python3 demo/serveur.py   puis ouvrir http://127.0.0.1:8781/demo/site.html
Sert le dossier du projet ; /demo/manifest.json liste les fichiers du thème
(toujours à jour, aucune étape de build).
"""
import http.server, json, os, sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
THEME = os.path.join(ROOT, 'fondation-lona')
PORT = 8781

class Handler(http.server.SimpleHTTPRequestHandler):
    def __init__(self, *a, **k):
        super().__init__(*a, directory=ROOT, **k)

    def end_headers(self):
        self.send_header('Access-Control-Allow-Origin', '*')
        self.send_header('Cache-Control', 'no-store')
        super().end_headers()

    def do_GET(self):
        if self.path.split('?')[0] == '/demo/manifest.json':
            files = []
            for base, dirs, names in os.walk(THEME):
                for n in names:
                    if n == '.DS_Store':
                        continue
                    files.append(os.path.relpath(os.path.join(base, n), THEME).replace(os.sep, '/'))
            body = json.dumps(sorted(files)).encode()
            self.send_response(200)
            self.send_header('Content-Type', 'application/json')
            self.send_header('Content-Length', str(len(body)))
            self.end_headers()
            self.wfile.write(body)
            return
        super().do_GET()

    def log_message(self, *args):
        pass

print(f'Démo Fondation LONA : http://127.0.0.1:{PORT}/demo/site.html  (Ctrl+C pour arrêter)')
http.server.ThreadingHTTPServer(('127.0.0.1', PORT), Handler).serve_forever()
