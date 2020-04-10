[![Maintainability](https://api.codeclimate.com/v1/badges/0aaea5dcb249f9766368/maintainability)](https://codeclimate.com/github/vitalii88/php-project-lvl1/maintainability)
![master_push](https://github.com/vitalii88/php-project-lvl1/workflows/master_push/badge.svg)

Это реализация первого проекта на портале hexlet.io.
На текущий момент проект находится в стадии разработки.

Работа первой игры:

[![asciicast](https://asciinema.org/a/aSJXKjtc2ohzFtjik1GvAo9Ki.svg)](https://asciinema.org/a/aSJXKjtc2ohzFtjik1GvAo9Ki)

Работа второй игры:

[![asciicast](https://asciinema.org/a/htPQ90zs7Ko4UCUlnc1elgzax.svg)](https://asciinema.org/a/htPQ90zs7Ko4UCUlnc1elgzax)

Работа третьей игры:

[![asciicast](https://asciinema.org/a/QSac45tM06dvGDsFaHP17e2i5.svg)](https://asciinema.org/a/QSac45tM06dvGDsFaHP17e2i5)

Работа четвертой игры:

[![asciicast](https://asciinema.org/a/8Uw2Ym4t0kPzLMzcX9pyXoSh8.svg)](https://asciinema.org/a/8Uw2Ym4t0kPzLMzcX9pyXoSh8)

Работа пятой игры:

[![asciicast](https://asciinema.org/a/ytOCxKCOF5nLU2M8YcM5jciW4.svg)](https://asciinema.org/a/ytOCxKCOF5nLU2M8YcM5jciW4)


--------------------------

Правки

https://github.com/vitalii88/php-project-lvl1/blob/1cc8b6d9a3a07f073688bbd377e12fe44e3b0ad5/src/games/Calc.php#L31

Для сборки строки лучше использовать интерполяцию.

Попробуйте собрать строку за пределами switch. Тогда вопрос будет сформирован одной строкой кода.

https://github.com/vitalii88/php-project-lvl1/blob/1cc8b6d9a3a07f073688bbd377e12fe44e3b0ad5/src/games/Calc.php#L18-L21

Вложенные определения (функций/констант) делаются тогда, когда их содержимое зависит от лексического контекста. Во всех остальных случаях предпочтительно выносить определения на уровень файла. Такой код легче читать, проще переиспользовать и по необходимости можно экспортировать и тестировать.


https://github.com/vitalii88/php-project-lvl1/blob/1cc8b6d9a3a07f073688bbd377e12fe44e3b0ad5/src/games/Progression.php#L17

Попробуйте сделать фунцию getProgression чистой.

Вообще, любой элемент прогрессии (в т.ч. спрятанный) вычисляется по простой формуле start + diff * i


