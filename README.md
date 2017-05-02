### Тестовое задание для кандидатов на должность "Middle PHP developer" в autotovarka.ru

1. Релизиовать классы из файла iTree.php и iNode.php таким образом, чтобы проходили тесты из Tests.php.
2. Нужна система учета кликов (открытий страницы) и уников (уникальных открытий). Статистика должна отображаться в реальном времени с максимальной задержкой 1 мин. Предложи решение.
3. Дана таблица поступлений товаров на склады компании следующего формата:
```
create table incoming (
    storage_id integer not null,
    category_id integer not null,
    quantity integer not null,
    time datetime not null
);
```
Напишите запрос, который выведет список последнего поступившего количества для каждого склада и категории товара. Таблица должна быть отсортирована по номеру склада (по возрастанию) и категории товара (по возрастанию). Например, для следующей таблицы:

| storage_id | category_id | quantity | time |
| -----------|-------------|----------|----- |
| 1 | 32 | 3 | 2015-03-17 13:55:32 |
| 1 | 32 | 8 | 2015-03-17 13:15:22 |
| 3 | 32 | 23 | 2015-03-17 14:45:57 |
| 1 | 7 | 13 | 2015-03-17 15:56:12 |
| 1 | 32 | 7 | 2015-03-17 17:05:37 |
| 2 | 17 | 1 | 2015-03-18 13:13:22 |
| 1 | 7 | 13 | 2015-03-19 21:53:17 |

запрос должен возвращать

| storage_id | category_id | quantity |
| -----------|-------------|--------- |
| 1 | 7 | 13 |
| 1 | 32 | 7 |
| 2 | 17 | 1 |
| 3 | 32 | 23 |

[Взято отсюда](https://www.nalogia.ru/about/developer_challenge.php)
  
Опционально, если останется время: 

 * Представить архитектуру классов кофемашины с использованием DI. Кофемашина состоит из нагревателя и насоса. Нагреватель - дорогой в использовании элемент, он “создается”, только когда понадобился в первый раз. Процесс готовки выглядит следующим образом: нагреватель разогревается, включается насос и прокачивает воду, затем нагреватель выключается и остывает через 10 секунд. Насос включается только если нагреватель разогрет.
 * Написать тесты на эту структуру


#### Примерное время выполнения - 2 часа

#### Ответы с кодом долнжы быть в отдельных фалах, ответы текстом в письме

#### Присылать выполненное задание через pull request к этому репозиторию
