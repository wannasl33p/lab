#!/bin/bash
if [ "$#" -ne 2 ]; then
  echo "Неверное количество параметров. Укажите имя файла и новое расширение."
  exit 1
fi

filename=$1
new_extension=$2

name_without_extension="${filename%.*}"
new_filename="$name_without_extension.$new_extension"

mv "$filename" "$new_filename"
echo "Файл $filename успешно переименован в $new_filename"