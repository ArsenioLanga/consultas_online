<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privete Area</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/admin.css')}}">
    <script scr="{{asset('assets/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
     integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    @include('userbar')
  
    @yield('conteudo')

   
    <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js ')}}"></script>
    <script src="{{asset('assets/bootstrap/javaScript.js ')}}"></script>
    <script>
        $(function(){
            var $sections = $('.form-section');
        

        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation.previous').toggle(index>0);
            var atTheEnd = index >=$sections.lenght - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type-submit]').toggle(atTheEnd);
        }

        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }

        $('.form_navigation /previuos').click(function(){
            navigateTo(curIndex() -1);
        });

        $('.form-navigation .next').click(funcion(){
            $('.contact-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function(){
                navigateTo((curIndex)+1);
            });
        });
        $sections.each(function(index, section){
            $('.section').find(':input').attr('data-parsley-group', 'block-'+index);
        });
        navigateTo(0);
     });
    </script>
</body>
</html>