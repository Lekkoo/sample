<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Default value') --- Elegant Laravel</title>
  </head>
  <body>
    @yield('content')
    <!-- 下面的这行代码表示该占位区域将用于显示 content 区块的内容，而 content 区块的内容将由继承自 default 视图的子视图定义 -->
  </body>
</html>
