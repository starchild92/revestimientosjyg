<?php

/* JYGRevestimientosBundle:Page:index.html.twig */
class __TwigTemplate_7853443be06d3123d1a7fe871f536d16a258795d119884d771367561177da42d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6ace380388f9ba9ce2232aaaf86c98adf83bbc7b5ddf0c60155f71cf433cbe36 = $this->env->getExtension("native_profiler");
        $__internal_6ace380388f9ba9ce2232aaaf86c98adf83bbc7b5ddf0c60155f71cf433cbe36->enter($__internal_6ace380388f9ba9ce2232aaaf86c98adf83bbc7b5ddf0c60155f71cf433cbe36_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6ace380388f9ba9ce2232aaaf86c98adf83bbc7b5ddf0c60155f71cf433cbe36->leave($__internal_6ace380388f9ba9ce2232aaaf86c98adf83bbc7b5ddf0c60155f71cf433cbe36_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f6ea3014d4c4c882e112878a1a64245c90adbe7e9ddc40de73deee3b95d4da6e = $this->env->getExtension("native_profiler");
        $__internal_f6ea3014d4c4c882e112878a1a64245c90adbe7e9ddc40de73deee3b95d4da6e->enter($__internal_f6ea3014d4c4c882e112878a1a64245c90adbe7e9ddc40de73deee3b95d4da6e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/css/carousel.css"), "html", null, true);
        echo "\">
";
        
        $__internal_f6ea3014d4c4c882e112878a1a64245c90adbe7e9ddc40de73deee3b95d4da6e->leave($__internal_f6ea3014d4c4c882e112878a1a64245c90adbe7e9ddc40de73deee3b95d4da6e_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_f4a9e1d101de73d4b7203828f6288b94ac16339b81bd771fb39d18083f65ef30 = $this->env->getExtension("native_profiler");
        $__internal_f4a9e1d101de73d4b7203828f6288b94ac16339b81bd771fb39d18083f65ef30->enter($__internal_f4a9e1d101de73d4b7203828f6288b94ac16339b81bd771fb39d18083f65ef30_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "\t<!-- ======================Carousel============================ -->
    <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
      <!-- Indicators -->
      <ol class=\"carousel-indicators\">
        <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
        <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
        <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
      </ol>
      <div class=\"carousel-inner\" role=\"listbox\">
        <div class=\"item active\">
          <img class=\"first-slide\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"First slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the \"next\" and \"previous\" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class=\"item\">
          <img class=\"second-slide\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"Second slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class=\"item\">
          <img class=\"third-slide\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"Third slide\">
          <div class=\"container\">
            <div class=\"carousel-caption\">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">
        <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
        <span class=\"sr-only\">Previous</span>
      </a>
      <a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">
        <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
        <span class=\"sr-only\">Next</span>
      </a>
    </div><!-- /.carousel -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class=\"container marketing\">

      <!-- Three columns of text below the carousel -->
      <div class=\"row\">
        <div class=\"col-lg-4\">
          <img class=\"img-circle\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
          <img class=\"img-circle\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
          <img class=\"img-circle\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class=\"featurette-divider\">

      <div class=\"row featurette\">
        <div class=\"col-md-7\">
          <h2 class=\"featurette-heading\">First featurette heading. <span class=\"text-muted\">It'll blow your mind.</span></h2>
          <p class=\"lead\">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class=\"col-md-5\">
          <img class=\"featurette-image img-responsive center-block\" data-src=\"holder.js/500x500/auto\" alt=\"Generic placeholder image\">
        </div>
      </div>

      <hr class=\"featurette-divider\">

      <div class=\"row featurette\">
        <div class=\"col-md-7 col-md-push-5\">
          <h2 class=\"featurette-heading\">Oh yeah, it's that good. <span class=\"text-muted\">See for yourself.</span></h2>
          <p class=\"lead\">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class=\"col-md-5 col-md-pull-7\">
          <img class=\"featurette-image img-responsive center-block\" data-src=\"holder.js/500x500/auto\" alt=\"Generic placeholder image\">
        </div>
      </div>

      <hr class=\"featurette-divider\">

      <div class=\"row featurette\">
        <div class=\"col-md-7\">
          <h2 class=\"featurette-heading\">And lastly, this one. <span class=\"text-muted\">Checkmate.</span></h2>
          <p class=\"lead\">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class=\"col-md-5\">
          <img class=\"featurette-image img-responsive center-block\" data-src=\"holder.js/500x500/auto\" alt=\"Generic placeholder image\">
        </div>
      </div>

      <hr class=\"featurette-divider\">

      <!-- /END THE FEATURETTES -->
    </div><!-- /.container -->
";
        
        $__internal_f4a9e1d101de73d4b7203828f6288b94ac16339b81bd771fb39d18083f65ef30->leave($__internal_f4a9e1d101de73d4b7203828f6288b94ac16339b81bd771fb39d18083f65ef30_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  51 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
