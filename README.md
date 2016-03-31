# Lean

Lean is a wordpress theme developped for [Continuous](http://continuousphp.com), the first and only PHP-centric PaaS to build, package, test and deploy applications in the same workflow by [Thibault Milan](http://thibaultmilan.com).



## Style

### Buttons as links

You can add the classes `ui button` to any link in your editor to get a button style. See [more styling options](http://semantic-ui.com/elements/button.html) for the buttons.

## Shortcodes

### Icon

You can use [all the icons provides by Semantic UI](http://semantic-ui.com/elements/icon.html) with this tag :

`[icon color="red" icon="heart" size="medium"]`

You wil get a red medium sized heart icon. See the [size](http://semantic-ui.com/elements/icon.html#size), [color](http://semantic-ui.com/elements/icon.html#colored) attributes

### Buttons

You can create [button links as made in Semantic UI](http://semantic-ui.com/elements/button.html) with this shortcut syntax :

`[button href="http://google.com" title="Discover our service" color="blue" size="medium"]See more[/button]`

[Size](http://semantic-ui.com/elements/button.html#size) and [color](http://semantic-ui.com/elements/button.html#colored) can be customized.

### Grid

#### Create a new row

Row can contain two or more columns and column will adjust at equal width:

`[row]content here event other shortcode[/row]`

#### Create a new column

`[column]content event shortcode[/column]`

#### Example of a 3 column grid

Be carefull, as we know, WordPress add automaticly `<p></p>` tags at any new line. To prevent any misrendering, carefully use the shortcodes.

```
[row][column]Professor, make a woman out of me. A true inspiration for the children. There's no part of that sentence I didn't like! Have you ever tried just turning off the TV, sitting down with your children, and hitting them?

[button href="http://google.com" title="Discover our service" color="blue" size="medium"]See more[/button][/column][column]And then the battle's not so bad? You guys go on without me! I'm going to go… look for more stuff to steal! These old Doomsday Devices are dangerously unstable. I'll rest easier not knowing where they are.

[button href="http://google.com" title="Discover our service" color="blue" size="medium"]See more[/button][/column][column]Enough about your promiscuous mother, Hermes! We have bigger problems. Guards! Bring me the forms I need to fill out to have her taken away! Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor.

[button href="http://google.com" title="Discover our service" color="blue" size="medium"]See more[/button][/column][/row]
```
