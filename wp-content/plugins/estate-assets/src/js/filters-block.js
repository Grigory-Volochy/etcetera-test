jQuery(function($){

      var filtersBlockOnChange = function(){

            $.ajax({
                  type: 'get',
                  url: estateassets_js_vars.ajax_url,
                  data: $('#filters-block-form').serialize(),
                  beforeSend: function(){},
                  success: function(response){
                        $('#filters-block-result').html(response);
                        $('#filters-block-pagination .page-link').on('click', filtersBlockPagination);
                  },
                  error: function(message){
                        console.log(message);
                  }
            });
      };

      var filtersBlockPagination = function(e){
            e.preventDefault();
            $('#filters-block-form [name="current_page"]').val($(this).attr('data-page'));
            filtersBlockOnChange();
      };

      $('#filters-block-pagination .page-link').on('click', filtersBlockPagination);
      $('#filters-block-form .form-control').on('change', filtersBlockOnChange);
});