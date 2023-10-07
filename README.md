## rector-sandbox

[rector](https://github.com/rectorphp/rector)を触ってみたというレポジトリ

### execute-rector

dry-run
```bash
vendor/bin/rector process sample/AvoidUndefinedIndexRector/Sample.php --dry-run
# or 
vendor/bin/rector process sample/AvoidUndefinedIndexRector/Sample.php
```

result
```bash
$vendor/bin/rector process sample/AvoidUndefinedIndexRector/Sample.php --dry-run
 1/1 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%
1 file with changes
===================

1) sample/AvoidUndefinedIndexRector/Sample.php:5

    ---------- begin diff ----------
@@ @@

     public function a()
     {
-        $array = $this->array['a'];
+        $array = isset($this->array['a']) ? $this->array['a'] : null;
     }
 }
    ----------- end diff -----------

Applied rules:
 * AvoidUndefinedIndexRector


                                                                                                                        
 [OK] 1 file would have changed (dry-run) by Rector                                                                     
                               
```

### execute-test
```bash
composer unit
```
