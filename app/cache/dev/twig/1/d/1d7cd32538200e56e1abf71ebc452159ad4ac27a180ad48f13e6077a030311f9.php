<?php

/* JYGRevestimientosBundle:Page:productos.html.twig */
class __TwigTemplate_1d7cd32538200e56e1abf71ebc452159ad4ac27a180ad48f13e6077a030311f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:productos.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_df82be971303f01e48efb077d38fea6e7d768ed45779aeaa61a2329a69230d53 = $this->env->getExtension("native_profiler");
        $__internal_df82be971303f01e48efb077d38fea6e7d768ed45779aeaa61a2329a69230d53->enter($__internal_df82be971303f01e48efb077d38fea6e7d768ed45779aeaa61a2329a69230d53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_df82be971303f01e48efb077d38fea6e7d768ed45779aeaa61a2329a69230d53->leave($__internal_df82be971303f01e48efb077d38fea6e7d768ed45779aeaa61a2329a69230d53_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_b9d8c2d0b8b34a011ea8408ccb0082edf38cae5700406ee2dc4037a591fb2891 = $this->env->getExtension("native_profiler");
        $__internal_b9d8c2d0b8b34a011ea8408ccb0082edf38cae5700406ee2dc4037a591fb2891->enter($__internal_b9d8c2d0b8b34a011ea8408ccb0082edf38cae5700406ee2dc4037a591fb2891_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_b9d8c2d0b8b34a011ea8408ccb0082edf38cae5700406ee2dc4037a591fb2891->leave($__internal_b9d8c2d0b8b34a011ea8408ccb0082edf38cae5700406ee2dc4037a591fb2891_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_b7a811d6f90be915d5450c7173a74cc0096b23bc3cd8478f1ace62c9d887a660 = $this->env->getExtension("native_profiler");
        $__internal_b7a811d6f90be915d5450c7173a74cc0096b23bc3cd8478f1ace62c9d887a660->enter($__internal_b7a811d6f90be915d5450c7173a74cc0096b23bc3cd8478f1ace62c9d887a660_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "\t
\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_b7a811d6f90be915d5450c7173a74cc0096b23bc3cd8478f1ace62c9d887a660->leave($__internal_b7a811d6f90be915d5450c7173a74cc0096b23bc3cd8478f1ace62c9d887a660_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:productos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 5,  35 => 3,  11 => 1,);
    }
}
