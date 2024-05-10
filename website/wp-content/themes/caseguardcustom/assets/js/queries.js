let my_slider_ref = null;
jQuery(document).ready(function ($) {
  function fetchCorsImages() {
    var colors = [];
    if ($("#image-filter-select").val() !== "none") {
      colors.push($("#image-filter-select").val());
    }

    $.ajax({
      url: cgcustom_vars.ajaxurl,
      method: "POST",
      data: {
        action: "fetch_filtered_articles_image",
        colors: colors,
      },
      success: function (response) {
        $("#slider_grid").html(response);
        if (my_slider_ref != null) {
          my_slider_ref.off("move");
        }
        $(".splide__pagination").remove();
        my_slider_ref = new Splide("#image-slider").mount();
        const li_list = $(".splide__slide").eq(0);
        const imgDataname = li_list.find("img").attr("data-name");
        console.log("Index:", 0, "Data-Name:", imgDataname);
        $("#image-names").html(imgDataname);
        my_slider_ref.on("move", (e) => {
          if (e >= 0) {
            const li_list = $(".splide__slide").eq(e);
            const imgDataname = li_list.find("img").attr("data-name");
            console.log("Index:", e, "Data-Name:", imgDataname);
            $("#image-names").html(imgDataname);
          }
        });
      },
    });
  }
  function fetchArticles() {
    var colors = [];
    $('input[name="color"]:checked').each(function () {
      colors.push($(this).val());
    });

    var seasons = [];
    $('input[name="season"]:checked').each(function () {
      seasons.push($(this).val());
    });

    var searchQuery = $("#article-search").val();

    $.ajax({
      url: cgcustom_vars.ajaxurl,
      method: "POST",
      data: {
        action: "fetch_filtered_articles",
        colors: colors,
        seasons: seasons,
        search: searchQuery,
      },
      success: function (response) {
        $("#articles-grid").html(response);
      },
    });
  }
  fetchArticles();
  fetchCorsImages();

  $("#image-filter-select").change(function () {
    fetchCorsImages();
  });

  $('input[name="color"], input[name="season"], #article-search').on(
    "change keyup",
    function () {
      fetchArticles();
    }
  );

  $("#reset-filters").click(function () {
    $('input[name="color"], input[name="season"]').prop("checked", false);
    $("#article-search").val("");
    fetchArticles();
  });
});
