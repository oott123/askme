#!/bin/bash
git ls-files | grep '\.php$' | xgettext --from-code=utf-8 -f- -k__ -p locales -o zh_CN.pot
cd locales
msgfmt zh_CN.pot -o zh_CN.mo
msgfmt en_US.po -o en_US.mo
