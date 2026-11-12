"""Prépare le dossier « netlify-demo » : démo autonome du thème, à glisser sur
https://app.netlify.com/drop (ou tout hébergement de fichiers statiques).

Usage : python3 demo/preparer-netlify.py
"""
import json, os, shutil

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
SRC_THEME = os.path.join(ROOT, 'fondation-lona')
OUT = os.path.join(ROOT, 'netlify-demo')

if os.path.isdir(OUT):
    shutil.rmtree(OUT)
shutil.copytree(SRC_THEME, os.path.join(OUT, 'fondation-lona'), ignore=shutil.ignore_patterns('.DS_Store'))

files = []
for base, dirs, names in os.walk(os.path.join(OUT, 'fondation-lona')):
    for n in names:
        files.append(os.path.relpath(os.path.join(base, n), os.path.join(OUT, 'fondation-lona')).replace(os.sep, '/'))
with open(os.path.join(OUT, 'manifest.json'), 'w') as f:
    json.dump(sorted(files), f)

html = open(os.path.join(ROOT, 'demo', 'site.html'), encoding='utf-8').read()
html = html.replace("'../fondation-lona/' + f", "'fondation-lona/' + f")
with open(os.path.join(OUT, 'index.html'), 'w', encoding='utf-8') as f:
    f.write(html)

# En-têtes Netlify : pas de cache agressif pour la page, cache long pour le thème.
with open(os.path.join(OUT, '_headers'), 'w') as f:
    f.write("/index.html\n  Cache-Control: no-cache\n/manifest.json\n  Cache-Control: no-cache\n")

print(f'Dossier prêt : {OUT} ({len(files)} fichiers du thème)')
