# Getting Started with Tailwind

First you need to make sure you have installed Node.js - [Getting Started with Node.js](getting_started_with_nodejs.md)

- Once you have Node.js up and running:
  - Download (or clone) this repository and unzip it into your _htdocs_ folder.
  - Open the folder in VS Code.
    - You should see this is the same example we looked at in the session earlier this week.
  - Open *index.html* in a web browser
    - At the moment it has no styling, we are going to style this page using Tailwind

## Installing Tailwind

- Using the shell/terminal navigate to the project directory.
- To make sure you are in the right place. Use `ls`/`dir` to make sure you are in the correct folder.
  - You should see _index.html_ listed along with the _js_ and _css_ folders.
- Next, install tailwind

```
npm install -D tailwindcss
```

- Then initialise tailwind

```
npx tailwindcss init
```

- This will create a _tailwind.config.js_ file.
- Open this file
- Modify it so it points to _index.html_ i.e.

```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html"],
  theme: {
    extend: {},
  },
  plugins: [],
};
```

- Under the content property we are specifying which files Tailwind should look through for references to its CSS rules.
- Add the following 'tailwind directives' to _css/input.css_

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

- This simple loads some basic CSS rules that Tailwind uses.
- In your terminal/shell enter

```
npx tailwindcss -i ./css/input.css -o ./css/style.css --watch
```

- Leave this window open. It is a command to watch for changes in the project and re-generate _style.css_ whenever we make a change.
- Refresh _index.html_ in a browser, you should find that Tailwind has applied its default base styles to your web page.

## Using Tailwind

- To use Tailwind, we don't write our own CSS instead we use classes from the framework.
- In _index.html_ add a class attribute to the body tag i.e.

```html
<body class="text-sky-950 text-lg"></body>
```

- Note the shell/terminal gives you some feedback that the CSS has been rebuilt.
- Reload the page in the browser to see the change.
- To understand what these classes are doing see the following:
  - colours - https://tailwindcss.com/docs/customizing-colors
  - changing the text colour - https://tailwindcss.com/docs/text-color#basic-usage
  - changing the font-size - https://tailwindcss.com/docs/font-size#basic-usage
- Open _style.css_, this is the CSS file that Tailwind generates.
  - Find the `text-sky-950` class (do a ctrl+f).
    - See how Tailwind has generated the CSS rule.

## Styling the Navigation Bar
Previously we styled the navigation bar using the following CSS

```css
/* CSS rules for the header*/
.header {
  background-color: rgb(8, 47, 73);
  color: white;
}
.header-wrapper {
  display: flex;
  justify-content: space-between;
  padding: 0.75em;
}
.nav-list {
  margin: 0;
}
.nav-opt {
  border-top: 1px solid white;
}
.nav-link {
  color: white;
  display: block;
}
.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.25);
}
.menu-icon {
  cursor: pointer;
}
```
- Try and re-create this using Tailwind. For most properties you should be able to search on the Tailwind website to find the equivalent Tailwind class and then add these classes in _index.html_. For example we need to set a background colour and text colour for the `header` element. So we'd add a class attribute to the `header` tag and use the `bg-sky-950` and `text-white` classes i.e.

```html
<header class="bg-sky-950 text-white"></header>
```
- Try and do the same for the other HTML elements in the `header`.
  - You don't need to make any changes to the CSS files! You only need to edit _index.html_
- If you get stuck here's a final correct version:

```html
<header class="bg-sky-950 text-white">
  <!--desktop-header-wrapper-->
  <div>
    <!--header-wrapper-->
    <div class="flex justify-between p-3">
      <!--logo-->
      <div>Amazing Film App</div>
      <!-- open icon-->
      <div onclick="toggleNav()" id="openIcon" class="cursor-pointer hidden">
        <svg width="30px" viewBox="0 0 10 10" fill="none">
          <path d="M1 1h8M1 4h 8M1 7h8" stroke="#fff" stroke-width="1" />
        </svg>
      </div>
      <!-- close icon-->
      <div onclick="toggleNav()" id="closeIcon" class="cursor-pointer">X</div>
    </div>
    <nav>
      <ul id="navList">
        <li class="border-t border-white">
          <a class="block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25" href="#"
            >Home</a
          >
        </li>
        <li class="border-t border-white">
          <a class="block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25" href="#"
            >Add New film</a
          >
        </li>
        <li class="border-t border-white">
          <a class="block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25" href="#"
            >About</a
          >
        </li>
      </ul>
    </nav>
  </div>
</header>
```
- There are already `onclick` event handlers for the menu icons. If you look in `app.js`, you will see that this references the Tailwind `hidden` class to toggle the visibility of page elements.
  - The navigation will show/hide without us having to make any further changes.

## Styling the Main Content of the Page
Again, here is the CSS we applied previously:

```css
/* CSS rules for the page contents*/
.main-content {
  padding: 0.25em;
}
.content-list {
  padding: 0;
}
.content-opt {
  border-bottom: 1px solid rgb(8, 47, 73);
}
.content-link {
  display: block;
}
.poster {
  display: block;
  margin: auto;
}
```
- Try and find the equivalent Tailwind css classes and add them to _index.html_.
- Your design won't be an exact match, try and find additional Tailwind properties to get the headings looking correct.

## Making This Responsive

Media queries are done in Tailwind by adding a modifier (`sm`,`md`,`lg` etc) to the class name e.g. `sm:text-red` will only apply this rule if the screen size is 640px or bigger. See https://tailwindcss.com/docs/responsive-design for more info.

- Change the header to the following:-

```html
<header class="bg-sky-950 text-white">
  <!--desktop-header-wrapper-->
  <div class="sm:flex sm:justify-between">
    <!--header-wrapper-->
    <div class="flex justify-between p-3">
      <!--logo-->
      <div>Amazing Film App</div>
      <!-- open icon-->
      <div
        onclick="toggleNav()"
        id="openIcon"
        class="cursor-pointer hidden sm:hidden"
      >
        <svg width="30px" viewBox="0 0 10 10" fill="none">
          <path d="M1 1h8M1 4h 8M1 7h8" stroke="#fff" stroke-width="1" />
        </svg>
      </div>
      <!-- close icon-->
      <div
        onclick="toggleNav()"
        id="closeIcon"
        class="cursor-pointer sm:hidden"
      >
        X
      </div>
    </div>
    <nav>
      <ul id="navList" class="sm:block sm:p-3">
        <li class="sm:inline sm:border-0 border-t border-white">
          <a
            class="sm:inline-block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25"
            href="#"
            >Home</a
          >
        </li>
        <li class="sm:inline sm:border-0 border-t border-white">
          <a
            class="sm:inline-block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25"
            href="#"
            >Add New film</a
          >
        </li>
        <li class="sm:inline sm:border-0 border-t border-white">
          <a
            class="sm:inline-block pt-1 pr-3 pb-1 pl-3 hover:bg-white/25"
            href="#"
            >About</a
          >
        </li>
      </ul>
    </nav>
  </div>
</header>
```

- Notice the use of the `sm` modifier. For example, we want to hide the open/close icons for wider displays, so we we use `sm:hidden` for these two elements.

### Adding a Two Columned Layout

- Here's the CSS we used previously for shifting the main content area to a two columned layout.

```css
.main-content {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.content-list-holder {
  width: 50%;
}
.content-list {
  margin: 0.25em;
}
.poster {
  float: right;
}
```

- Try and implement these rules using Tailwind classes with the `sm` modifier e.g. the containing `div` for the main content would look like:

```html
<!-- main-content-->
<div class="p-1 sm:flex sm:flex-row sm:flex-wrap"></div>
```

### Limiting the Final Page Size

- Previously, when the screen size got to over 1000px we switched to a fixed size design. We used a media query to do this:-

```css
@media screen and (min-width: 1024px) {
  .desktop-header-wrapper,
  .main-content {
    width: 1024px;
    margin-left: auto;
    margin-right: auto;
  }
}
```

- Try and do this using Tailwind. You will need to use the `lg` modifier.

## Testing Your Understanding

- Like the example we looked at previously, the design will need tweaking e.g. by setting some padding/margins on elements.
- You might also want to look at how we can customise Tailwind e.g. if we want to use our own colours or fonts (https://tailwindcss.com/docs/configuration).

## Using Tailwind in Laravel
If you look in your Laravel projects you will see that there is already a *tailwind.config.js* file. Laravel expects us to use Tailwind. 
  - This config file is set-up to look through all the blade files in the resources folder, looking for references to Tailwind CSS classes.
  - There is also a source CSS file *resources/css/app.css* that Tailwind will use as an input to generate the CSS.

To get Tailwind working, you simply need to:-

- Install the Tailwind CSS NPM tool in your Laravel project folder
```
npm install -D tailwindcss
```
- Instruct Tailwind to generate your CSS
```
npx tailwindcss -i ./resources/css/app.css -o ./public/css/style.css --watch
```
- And finally add the Tailwind classes to your blade files e.g.
```html
<body class="bg-emerald-600 p-5 text-white">
```

