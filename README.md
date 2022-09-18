# mtcg-rewards-gens
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

For consistency, every randomizer in this repository uses the following classes:

````
.random-gen {}
.random-gen > label {}
.random-gen-rewards {}
````

All text is wrapped in `p` tags, instead of relying on a lot of really bad, invalid `<br />` styling involved in old MyTCG files (and even in some scripts following). The proper way to use `<p>` is as follows:

````<p>Some text here.</p>
<p>Oh, look! Another line!</p>````

That spits out:

````Some text here.

Oh, look! Another line!````

The wrong way to use it is as follows:

````<p>Opening a paragraph, but...<br /><br />
<p>Not closing it and opening a new one instead?<br /><br />
<p>No, no, no...<br /><br />````

Paragraph tags do pretty much the *same thing* as `<br />`, but WAY BETTER with more efficiency. Browsers *read* code and display it accordingly. Some browsers might not do this and just...won't display it at all. Slow internet definitely won't. More than that, it's simply not accessible.

You *can* use `<p>` and `<br />` together. Look at this example. This code:

````<p>The quick, brown fox?</p>
<p>Yeah, he jumped over the lazy dog.</p>

<p>The quick, brown fox<br />
Jumped over<br />
The lazy dog.</p>````

spits out:

````The quick, brown fox?

Yeah, he jumped over the lazy dog.

The quick, brown fox
Jumped over
The lazy dog.````
