var jsbin = {};
jsbin.user = {"avatar":"https://www.gravatar.com/avatar/ef0e76cc0798b1740e7b6d1e6eacd6ac?s=29&d=https%3A%2F%2Fjsbin-gravatar.herokuapp.com%2Fnaeluh.png","name":"naeluh","bincount":210,"created":"2013-07-29T16:27:23.000Z","pro":1,"settings":{"panels":["html","javascript","css","live"],"editor":{"indentWithTabs":false,"indentUnit":1,"theme":"cobalt","tabSize":1,"lineWrapping":true,"lineNumbers":true},"font":10,"addons":{"closebrackets":true,"highlight":true,"vim":false,"emacs":false,"trailingspace":false,"fold":false,"sublime":true,"tern":false,"activeline":true,"matchbrackets":true,"matchtags":true},"includejs":true,"gui":{"toppanel":false},"jshint":true,"jshintOptions":{},"csshint":false,"csshintOptions":{},"htmlhint":false,"htmlhintOptions":{},"coffeescripthint":false,"coffeescripthintOptions":{},"hintShow":{"console":true,"line":false,"gutter":false},"focusedPanel":"html","ssl":false,"layout":"0"},"large_avatar":"https://www.gravatar.com/avatar/ef0e76cc0798b1740e7b6d1e6eacd6ac?s=120&d=blank"};

if (jsbin.user && jsbin.user.name) {
  $('.loggedout').hide();
  var menu = $('.loggedin').show();
  var html = $('#profile-template').text();
  var $html = $(html.replace(/({.*?})/g, function (all, match) {
    var key = match.slice(1, -1).trim(); // ditch the wrappers
    return jsbin.user[key] || '';
  }));
  if (jsbin.user.pro) {
    document.documentElement.className += ' pro';
    $html.find('.gopro').remove();
  } else {
    $html.find('.pro').remove();
  }
  var $menu = menu.append($html);
} else {
  $('.loggedout').show();
}