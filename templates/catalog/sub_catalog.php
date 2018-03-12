{% include 'header.html' %}

<!-- Основной блок -->
<div class="main">

    <!-- Левый блок -->
    <div class="left">

        <!-- Меню -->
        {% include 'menu.html' %}

    </div>

<!--     Правый блок-->
    <div class="right">

        <div class="kroshki"><a href="{{ domain }}">Главная страница</a> / <a href="{{ domain }}/catalog/">Каталог</a></div>
        <div>
            <div class="h_stycky">
                <h2 class="namecat">{{ content_data.sub_product.name }}</h2></div>
            <div class="tovar_category">
                {% for sub_product in content_data.sub_products %}
                <div class="product_category">
                    <div><h2>{{ sub_product.name }}</h2></div>
                    <a href="{{ domain }}good/{{ sub_product.id_good }}/">
                        <img src="{{ domain }}{{ sub_product.foto }}" alt="">
                    </a>
                </div>
                {% endfor %}
            </div>
        </div>

<!--            <pre>-->
<!--              {{ dump(content_data.sub_products) }}-->
<!--            </pre>-->

    </div>
    <!-- Нижняя часть главного блока -->
    {% include 'brand.html' %}

    {% include 'instagram.html' %}

    {% include 'network.html' %}

</div>

{% include 'footer.html' %}
</body>

</html>