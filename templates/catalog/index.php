{% include 'header.html' %}

<!-- Основной блок -->
<div class="main">

  <!-- Левый блок -->
  <div class="left">

    <!-- Меню -->
    {% include 'menu.html' %}

    <div class="open">
      <p>now<br>is<br>open!</p>
    </div>

  </div>

  <!-- Правый блок -->
  <div class="right">

    <div class="kroshki"><a href="{{ domain }}">Главная страница</a></div>
    {% for item in content_data.catalog %}
    <div>
      <div class="h_stycky">
        <h2 class="namecat">{{ item.name }}</h2></div>
        <div class="tovar_category">
          {% for item1 in item.sub_category %}
          <div class="product_category">
            <div><h2>{{ item1.name }}</h2></div>
            <a href="{{ domain }}catalog/sub_catalog/{{ item1.url_category }}/">
              <img src="{{ domain }}{{ item1.foto_category }}" alt=""
                  >
            </a>
          </div>
          {% endfor %}
      </div>
    </div>
    {% endfor %}

  </div>
    <!-- Нижняя часть главного блока -->
    {% include 'brand.html' %}

    {% include 'instagram.html' %}

    {% include 'network.html' %}

</div>

{% include 'footer.html' %}
</body>

</html>