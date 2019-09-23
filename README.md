# DatabaseHandler

A class to help with common CRUD operations directly to the database using PDO.

## Usage

Initialisation

```php
$dbHandler = DatabaseHandler::getInstance();
$dbHandler->connect(
    "database_name_here",
    "localhost",
    "root",
    "",
    "utf8",
    "mysql"
);
```

Fetch an entity by a property

```php
$entity = $dbHandler->find(
    "table_name_here", 
    ["property_name" => "property_value"], 
    "entity_class_here"
);
```
Fetch all entities

```php
$entities = $dbHandler->findAll("table_name_here", "entity_class_here");
```

Insert a row

```php
$dbHandler->insertARow("table_name_here", [
    "column_name" => "value",
    "other_column_name" => "other_value",
    ...
]);
```

Delete rows

```php
$dbHandler->delete("table_name_here", "id = 5")
```

Empty a table (use with caution)

```php
$dbHandler->purgeTable("table_name_here");
```

> Parameters `select` and `where` are plain SQL
> ```php
> $tasks = $dbHandler->findAll("task", Task::class, "task_reference > 3", "title, content");
> ```