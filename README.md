## rector-sandbox

[rector](https://github.com/rectorphp/rector)を触ってみたというレポジトリ

### execute-rector

dry-run
```bash
vendor/bin/rector process sample/AvoidUndefinedIndexRector/Sample.php --dry-run
# or 
vendor/bin/rector process sample/AvoidUndefinedIndexRector/Sample.php
```

### execute-test
```bash
composer unit
```
