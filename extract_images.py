import re

with open('jpl478_full_build_work_instructions (1) (1).html', 'r', encoding='utf-8') as f:
    html = f.read()

# The html file contains a line like: const IMAGES = { ... };
match = re.search(r'(const IMAGES = \{.*?\});', html, re.DOTALL)
if match:
    with open('public/js/images.js', 'w', encoding='utf-8') as out:
        out.write(match.group(1) + "\n")
    print("Successfully extracted IMAGES to images.js")
else:
    print("Could not find IMAGES in html.")
