<?php

/* JYGRevestimientosBundle::base.html.twig */
class __TwigTemplate_676b3d1ed19a71228f621a380e9bce8faa71497af620d3512158a32835fd1fcb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3e644e5f5a24b49af73bf854040a5d48652889250c885ce3e3df7426fdb36064 = $this->env->getExtension("native_profiler");
        $__internal_3e644e5f5a24b49af73bf854040a5d48652889250c885ce3e3df7426fdb36064->enter($__internal_3e644e5f5a24b49af73bf854040a5d48652889250c885ce3e3df7426fdb36064_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"UTF-8\" />
\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/css/bootstrap.css"), "html", null, true);
        echo "\">
\t";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
</head>
<body>
\t<nav class=\"navbar navbar-default navbar-fixed-top\">
\t\t<div class=\"container\">
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t</button>
\t\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_inicio");
        echo "\">Revestimientos J&G</a>
\t\t\t</div>
\t\t\t<div id=\"navbar\" class=\"navbar-collapse collapse\">
\t\t\t\t<ul class=\"nav navbar-nav navbar-right\">
\t\t\t\t\t<li class=\"";
        // line 24
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "index")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_inicio");
        echo "\">Inicio</a></li>
\t\t\t\t\t<li class=\"";
        // line 25
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "productos")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_productos");
        echo "\">Productos</a></li>
\t\t\t\t\t<li class=\"";
        // line 26
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "galeria")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_galeria");
        echo "\">Galería</a></li>
\t\t\t\t\t<li class=\"";
        // line 27
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "vision")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_vision");
        echo "\">Visión</a></li>
\t\t\t\t\t<li class=\"";
        // line 28
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "mision")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_mision");
        echo "\">Misión</a></li>
\t\t\t\t\t<li class=\"";
        // line 29
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "contacto")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_contacto");
        echo "\">Contacto</a></li>
\t\t\t\t\t<li class=\"";
        // line 30
        echo (((strtr($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("jyg_revestimientos_page_" => "")) == "ayuda")) ? ("active") : (""));
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_ayuda");
        echo "\">Ayuda</a></li>
\t\t\t\t</ul>
\t\t\t\t<!--<ul class=\"nav navbar-nav pull-right\">
\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dropdown <span class=\"caret\"></span></a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t<li><a href=\"#\">Action</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\">Another action</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\">Something else here</a></li>
\t\t\t\t\t\t\t<li role=\"separator\" class=\"divider\"></li>
\t\t\t\t\t\t\t<li class=\"dropdown-header\">Nav header</li>
\t\t\t\t\t\t\t<li><a href=\"#\">Separated link</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\">One more separated link</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t</ul> -->
\t\t\t</div><!--/.nav-collapse -->
\t\t</div>
\t</nav>
\t<div class=\"container navSpace\">
\t\t";
        // line 50
        $this->displayBlock('body', $context, $blocks);
        // line 51
        echo "\t</div>
\t<div class=\"container\">
\t\t<!-- FOOTER -->
\t\t<footer>
\t\t\t<p class=\"pull-right\"><a href=\"#\">Back to top</a></p>
\t\t\t<p>&copy; 2014 Company, Inc. &middot; <a href=\"#\">Privacy</a> &middot; <a href=\"#\">Terms</a></p>
\t\t</footer>

\t</div><!-- /.container -->

\t<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t";
        // line 63
        $this->displayBlock('javascripts', $context, $blocks);
        // line 64
        echo "</body>
</html>
";
        
        $__internal_3e644e5f5a24b49af73bf854040a5d48652889250c885ce3e3df7426fdb36064->leave($__internal_3e644e5f5a24b49af73bf854040a5d48652889250c885ce3e3df7426fdb36064_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_8ba8cb1f69c9e8e04dc31ff0d04d85ce98e1bb77317e49e6fcc35be5b770836a = $this->env->getExtension("native_profiler");
        $__internal_8ba8cb1f69c9e8e04dc31ff0d04d85ce98e1bb77317e49e6fcc35be5b770836a->enter($__internal_8ba8cb1f69c9e8e04dc31ff0d04d85ce98e1bb77317e49e6fcc35be5b770836a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Barquisimeto";
        
        $__internal_8ba8cb1f69c9e8e04dc31ff0d04d85ce98e1bb77317e49e6fcc35be5b770836a->leave($__internal_8ba8cb1f69c9e8e04dc31ff0d04d85ce98e1bb77317e49e6fcc35be5b770836a_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2e824316872afe25222d0cd7d3f341b6a5f2108680b7e553fedb50134686c410 = $this->env->getExtension("native_profiler");
        $__internal_2e824316872afe25222d0cd7d3f341b6a5f2108680b7e553fedb50134686c410->enter($__internal_2e824316872afe25222d0cd7d3f341b6a5f2108680b7e553fedb50134686c410_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_2e824316872afe25222d0cd7d3f341b6a5f2108680b7e553fedb50134686c410->leave($__internal_2e824316872afe25222d0cd7d3f341b6a5f2108680b7e553fedb50134686c410_prof);

    }

    // line 50
    public function block_body($context, array $blocks = array())
    {
        $__internal_4c31e79dd7bae5e1fd62e9c293903e7493882c1bab912c98f3366ab93654bc63 = $this->env->getExtension("native_profiler");
        $__internal_4c31e79dd7bae5e1fd62e9c293903e7493882c1bab912c98f3366ab93654bc63->enter($__internal_4c31e79dd7bae5e1fd62e9c293903e7493882c1bab912c98f3366ab93654bc63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_4c31e79dd7bae5e1fd62e9c293903e7493882c1bab912c98f3366ab93654bc63->leave($__internal_4c31e79dd7bae5e1fd62e9c293903e7493882c1bab912c98f3366ab93654bc63_prof);

    }

    // line 63
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_756ea661309bb43574fc7d12f8cf3ff9e3b264a0572a690049630a08e059fd19 = $this->env->getExtension("native_profiler");
        $__internal_756ea661309bb43574fc7d12f8cf3ff9e3b264a0572a690049630a08e059fd19->enter($__internal_756ea661309bb43574fc7d12f8cf3ff9e3b264a0572a690049630a08e059fd19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_756ea661309bb43574fc7d12f8cf3ff9e3b264a0572a690049630a08e059fd19->leave($__internal_756ea661309bb43574fc7d12f8cf3ff9e3b264a0572a690049630a08e059fd19_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 63,  182 => 50,  171 => 7,  159 => 5,  150 => 64,  148 => 63,  144 => 62,  140 => 61,  128 => 51,  126 => 50,  101 => 30,  95 => 29,  89 => 28,  83 => 27,  77 => 26,  71 => 25,  65 => 24,  58 => 20,  42 => 8,  40 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
