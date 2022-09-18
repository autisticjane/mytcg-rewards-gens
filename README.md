# mtcg-rewards-generator
Various MyTCG reward generators.

## Using the generators

### ``random_update.php``
You will need to define the ``count`` and ``date`` parameters in the URL in order for the update randomizer to work. It will only work for the most recent update and will always pull only one from each deck recently released.

Initiate the usage of parameters by adding a question mark (`?`) before the first parameter and using ampersand (`&`) to include more parameters. E.g. `random_update.php**?**count=2**&**date=18 Sept 22` will spit out
* **2** random cards from the latest update (maximum one from each deck) and
* prefix the activity **New Decks (18 Sept 22):** for logs.

#### Troubleshoot
Recently released decks must have a recently created ID in the database, or else this randomizer will not work.

In other words, if your deck list is set up to have a `released` and `unreleased` dropdown instead of using an upcoming table and a released cards table, you will not be able to use this randomizer.

### Custom styling
Include the provided CSS file in your header, or add the styling to your `style.css`.

Add this line to your header, between the ``<head>`` and ``</head>`` tags, somewhere under the ``</title>`` tag.

```
  <link rel="stylesheet" href="css/random-generators.css" type="text/css" media="screen">
```
