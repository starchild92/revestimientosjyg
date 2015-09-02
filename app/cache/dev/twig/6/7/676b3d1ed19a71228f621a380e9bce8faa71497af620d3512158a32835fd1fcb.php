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
        $__internal_b1f9cd8029b815e6f8a6679f0d9e5f9673cc7a5e7f0395721e592ed8869d7b64 = $this->env->getExtension("native_profiler");
        $__internal_b1f9cd8029b815e6f8a6679f0d9e5f9673cc7a5e7f0395721e592ed8869d7b64->enter($__internal_b1f9cd8029b815e6f8a6679f0d9e5f9673cc7a5e7f0395721e592ed8869d7b64_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle::base.html.twig"));

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
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/css/navbar-fixed-top.css"), "html", null, true);
        echo "\">
\t";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
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
        // line 21
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_inicio");
        echo "\">Revestimientos J&G</a>
\t\t\t</div>
\t\t\t<div id=\"navbar\" class=\"navbar-collapse collapse\">
\t\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t\t<li class=\"active\"><a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_inicio");
        echo "\">Inicio</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_productos");
        echo "\">Productos</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_galeria");
        echo "\">Galería</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_vision");
        echo "\">Visión</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_mision");
        echo "\">Misión</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_contacto");
        echo "\">Contacto</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("JYGRevestimientosBundle_ayuda");
        echo "\">Ayuda</a></li>
\t\t\t\t</ul>
\t\t\t\t<ul class=\"nav navbar-nav pull-right\">
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
\t\t\t\t</ul>
\t\t\t</div><!--/.nav-collapse -->
\t\t</div>
\t</nav>
\t<div class=\"container\">
\t\t";
        // line 51
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "\t</div>
\t<div class=\"container\">
\t\t<!-- FOOTER -->
\t\t<footer>
\t\t\t<p class=\"pull-right\"><a href=\"#\">Back to top</a></p>
\t\t\t<p>&copy; 2014 Company, Inc. &middot; <a href=\"#\">Privacy</a> &middot; <a href=\"#\">Terms</a></p>
\t\t</footer>

\t</div><!-- /.container -->

\t<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t";
        // line 64
        $this->displayBlock('javascripts', $context, $blocks);
        // line 65
        echo "</body>
</html>
";
        
        $__internal_b1f9cd8029b815e6f8a6679f0d9e5f9673cc7a5e7f0395721e592ed8869d7b64->leave($__internal_b1f9cd8029b815e6f8a6679f0d9e5f9673cc7a5e7f0395721e592ed8869d7b64_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_d27971fcaee660bae9bb8c9047109c31aeef9b269fff3a94e7e621c6431e8ac3 = $this->env->getExtension("native_profiler");
        $__internal_d27971fcaee660bae9bb8c9047109c31aeef9b269fff3a94e7e621c6431e8ac3->enter($__internal_d27971fcaee660bae9bb8c9047109c31aeef9b269fff3a94e7e621c6431e8ac3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Barquisimeto";
        
        $__internal_d27971fcaee660bae9bb8c9047109c31aeef9b269fff3a94e7e621c6431e8ac3->leave($__internal_d27971fcaee660bae9bb8c9047109c31aeef9b269fff3a94e7e621c6431e8ac3_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_78ba0a1c3c3c4c18da5b4033d72c6306fc43b1fa81d66d99d395c589a9d1e542 = $this->env->getExtension("native_profiler");
        $__internal_78ba0a1c3c3c4c18da5b4033d72c6306fc43b1fa81d66d99d395c589a9d1e542->enter($__internal_78ba0a1c3c3c4c18da5b4033d72c6306fc43b1fa81d66d99d395c589a9d1e542_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_78ba0a1c3c3c4c18da5b4033d72c6306fc43b1fa81d66d99d395c589a9d1e542->leave($__internal_78ba0a1c3c3c4c18da5b4033d72c6306fc43b1fa81d66d99d395c589a9d1e542_prof);

    }

    // line 51
    public function block_body($context, array $blocks = array())
    {
        $__internal_10e654c13ecb1f8f59f04dd6f19674f61747dc8e597929937af859287c04d4f9 = $this->env->getExtension("native_profiler");
        $__internal_10e654c13ecb1f8f59f04dd6f19674f61747dc8e597929937af859287c04d4f9->enter($__internal_10e654c13ecb1f8f59f04dd6f19674f61747dc8e597929937af859287c04d4f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_10e654c13ecb1f8f59f04dd6f19674f61747dc8e597929937af859287c04d4f9->leave($__internal_10e654c13ecb1f8f59f04dd6f19674f61747dc8e597929937af859287c04d4f9_prof);

    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4d71b406b2c2e77a80034fb497c80d7b306f0fa52541504c3ffad432c57873b1 = $this->env->getExtension("native_profiler");
        $__internal_4d71b406b2c2e77a80034fb497c80d7b306f0fa52541504c3ffad432c57873b1->enter($__internal_4d71b406b2c2e77a80034fb497c80d7b306f0fa52541504c3ffad432c57873b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4d71b406b2c2e77a80034fb497c80d7b306f0fa52541504c3ffad432c57873b1->leave($__internal_4d71b406b2c2e77a80034fb497c80d7b306f0fa52541504c3ffad432c57873b1_prof);

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
        return array (  183 => 64,  172 => 51,  161 => 8,  149 => 5,  140 => 65,  138 => 64,  134 => 63,  130 => 62,  118 => 52,  116 => 51,  93 => 31,  89 => 30,  85 => 29,  81 => 28,  77 => 27,  73 => 26,  69 => 25,  62 => 21,  46 => 9,  44 => 8,  40 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
