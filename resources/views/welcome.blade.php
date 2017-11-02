<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example</title>
</head>
<body>
  <div id="app"></div>

  <script src="{{ asset('js/app.js') }}"></script>

	<div id="app-4">
	  <ol>
	    <li v-for="todo in todos">
	      @{{ todo.text }}
	    </li>
	  </ol>
	</div>
	<script>
	var app4 = new Vue({
	  el: '#app-4',
	  data: {
	    todos: [
	      { text: '学习 JavaScript' },
	      { text: '学习 Vue' },
	      { text: '整个牛项目' }
	    ]
	  }
	})
	</script>


</body>
</html>
