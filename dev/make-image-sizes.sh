#!/bin/bash
# Makes smaller copies of an image for phones and tablets, named the way the
# site looks for them (photo.jpg -> photo-p-500.jpg, photo-p-800.jpg, photo-p-1600.jpg).
# Uses "sips", which is built into every Mac.
#
# Usage, in Terminal from the repo folder:
#   bash dev/make-image-sizes.sh images/work/my-project.jpg
#
# Tip: save the original at about 2000px wide first, as a JPG, to keep the site fast.
set -e
for src in "$@"; do
  base="${src%.*}"; ext="${src##*.}"
  width=$(sips -g pixelWidth "$src" | awk '/pixelWidth/ {print $2}')
  for w in 500 800 1600; do
    if [ "$w" -lt "$width" ]; then
      sips --resampleWidth "$w" "$src" --out "$base-p-$w.$ext" >/dev/null
      echo "Made $base-p-$w.$ext"
    fi
  done
done
