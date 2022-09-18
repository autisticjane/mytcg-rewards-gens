# mtcg-rewards-gens
Various MyTCG reward generators from Zest TCG.

## Table of contents
* [Using the generators/randomizers](#using-the-generators)
* [bbcode randomizer](#bbcode-randomizer)
* [HTML generator](#html-generator)
* [Update randomizer](#update-randomizer)
* [Custom styling](#custom-styling)

## Using the generators
These might not work with your code today.

They have not been tested since Zest ended and won't be tested until my new TCG is up. Other edits will be made in the future, and this README will change accordingly. For one, I plan to use flexboxes or CSS grid for the forms instead. Right now, these are just quick uploads.

{&uarr; [top](#mtcg-rewards-gens)}

### bbcode randomizer
(`random_forum.php` & `random_bb.php`)

If you only have one card worth (no cards worth 2), use `random_bb.php`. You can edit `random_forum.php` to work with your TCG regardless, but it will be quicker to just choose `random_bb.php`.

If you choose to edit `random_forum.php` instead, remove lines 11-16:

````
<tr><td><label for="type">Type of Cards?</label></b></td><td><select id="type" name="type">
<option value="">-------</option>
<option value="1">Regular</option>
<option value="2">Special</option>
<option value="1' OR `worth`='2">Both</option>			
</select></td></tr>
````

On Line 31, you need to change `{$_POST['type']}` to `1`. Or, delete this line:

````
$result=mysql_query("SELECT * FROM `$table_cards` WHERE `worth`='{$_POST['type']}'") or die("Unable to select from database.");
````

and replace it with this one:

````
$result=mysql_query("SELECT * FROM `$table_cards` WHERE `worth`='1'") or die("Unable to select from database.");
````

The difference between `random_bb.php` and `random_forum.php` is that `random_bb.php` already has these edits.

{&uarr; [top](#mtcg-rewards-gens)}

### HTML generator
(`gen_html.php`)

The HTML generator spits the card names out in HTML form.

So `apples01, bananas02, cauliflower03` might turn into

````
<img src="https://food.tcg.mer.media/cards/apples01.png" /> <img src="https://food.tcg.mer.media/cards/bananas02.png" /> <img src="https://food.tcg.mer.media/cards/cauliflower03.png" /> 
````

It will not spit out the reward name.

I don't remember what this one was used for in the past, but I recommend not using it since it's not accessible. Putting the card name in the `ALT` attribute is crucial to both disabled players and players with bad internet connection -- or for any player who struggles, for whatever reason, to load all of the cards.

It's only in this repository so I can say, in the future, that *all my randomizers* are here.

{&uarr; [top](#mtcg-rewards-gens)}

### Update randomizer
(`random_update.php`)

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

{&uarr; [top](#mtcg-rewards-gens)}

#### Troubleshoot
Recently released decks must have a recently created ID in the database, or else this randomizer will not work.

In other words, if your deck list is set up to have a `released` and `unreleased` dropdown instead of using an upcoming table and a released cards table, you will not be able to use this randomizer.

{&uarr; [top](#mtcg-rewards-gens)}

## Custom styling
Include the provided CSS file in your header, or add the styling to your `style.css`. The randomizers will function without this, they just might not look as pretty.

Add this line to your header, between the ``<head>`` and ``</head>`` tags, somewhere under the ``</title>`` tag.

````
  <link rel="stylesheet" href="css/random-generators.css" type="text/css" media="screen">
````

For consistency, every randomizer in this repository uses the following selectors:

````
.random-gen {}
.random-gen > label {}
.random-rewards {}
````

All text is wrapped in `p` tags, instead of relying on a lot of really bad, invalid `<br />` styling involved in old MyTCG files (and even in some scripts following). The proper way to use `<p>` is as follows:

````
<p>Some text here.</p>
<p>Oh, look! Another line!</p>
````

That spits out:

````
Some text here.

Oh, look! Another line!
````

The wrong way to use it is as follows:

````
<p>Imagine opening a paragraph, but...<br /><br />
<p>Not closing it and opening a new one instead?<br /><br />
<p>No, no, no...<br /><br />
````

Paragraph tags do pretty much the *same thing* as `<br />`, but WAY BETTER with more efficiency. Browsers *read* code and display it accordingly. Some browsers might not do this and just...won't display it at all. Slow internet definitely won't. More than that, it's simply not accessible.

You *can* use `<p>` and `<br />` together. Look at this example. This code:

````
<p>The quick, brown fox?</p>
<p>Yeah, he jumped over the lazy dog.</p>

<p>The quick, brown fox<br />
Jumped over<br />
The lazy dog.</p>
````

spits out:

````
The quick, brown fox?

Yeah, he jumped over the lazy dog.

The quick, brown fox
Jumped over
The lazy dog.
````

{&uarr; [top](#mtcg-rewards-gens)}
