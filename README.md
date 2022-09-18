# mtcg-rewards-generator
Various MyTCG reward generators.

## Using the generators

### Update randomizer (``random_update.php``)
You will need to define the ``count`` and ``date`` parameters in the URL in order for the update randomizer to work. It will only work for the most recent update and will always pull only one from each deck recently released.

Initiate the usage of parameters by adding a question mark (`?`) before the first parameter and using ampersand (`&`) to include more parameters.

* `count` represents how many decks you've just released. Whatever number you define here is how many decks the randomizer will pull from *and* how many cards will be displayed. No more than one card will be displayed per deck.
* `date` should be the date of the update. You cannot use this randomizer for older updates.

E.g. `random_update.php?count=2&date=18 Sept 22` will spit out
* **2** random cards from the last 2 released decks (maximum one from each deck) and
* prefix the activity **New Decks (18 Sept 22):** for logs.

A full URL for this might look like: `https://tv.tcg.mer.media/random_update.php?date=18 Sept 22&count=10`
* The activity will be **New Decks (18 Sept 22)**
* **10** random cards from the last 10 released decks, max one per deck, will be displayed

The parameters do **not** have to be defined in order.

#### Troubleshoot
Recently released decks must have a recently created ID in the database, or else this randomizer will not work.

In other words, if your deck list is set up to have a `released` and `unreleased` dropdown instead of using an upcoming table and a released cards table, you will not be able to use this randomizer.

### Custom styling
Include the provided CSS file in your header, or add the styling to your `style.css`.

Add this line to your header, between the ``<head>`` and ``</head>`` tags, somewhere under the ``</title>`` tag.

```
  <link rel="stylesheet" href="css/random-generators.css" type="text/css" media="screen">
```
