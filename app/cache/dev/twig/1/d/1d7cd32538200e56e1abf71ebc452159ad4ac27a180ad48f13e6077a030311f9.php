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
        $__internal_36d06bd2e9943226243c27ff362db0dc311fa74a0f9f9c4e3117f3ea8c72fce9 = $this->env->getExtension("native_profiler");
        $__internal_36d06bd2e9943226243c27ff362db0dc311fa74a0f9f9c4e3117f3ea8c72fce9->enter($__internal_36d06bd2e9943226243c27ff362db0dc311fa74a0f9f9c4e3117f3ea8c72fce9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_36d06bd2e9943226243c27ff362db0dc311fa74a0f9f9c4e3117f3ea8c72fce9->leave($__internal_36d06bd2e9943226243c27ff362db0dc311fa74a0f9f9c4e3117f3ea8c72fce9_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_0fd09a0fd43ecc63c8a4609b769a2f1ee2f1b23a2c461d1b629c672402759186 = $this->env->getExtension("native_profiler");
        $__internal_0fd09a0fd43ecc63c8a4609b769a2f1ee2f1b23a2c461d1b629c672402759186->enter($__internal_0fd09a0fd43ecc63c8a4609b769a2f1ee2f1b23a2c461d1b629c672402759186_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_0fd09a0fd43ecc63c8a4609b769a2f1ee2f1b23a2c461d1b629c672402759186->leave($__internal_0fd09a0fd43ecc63c8a4609b769a2f1ee2f1b23a2c461d1b629c672402759186_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_8d10bfc15d7351452cec9a54737834a0f1249d885632a1a605306f9a11679e24 = $this->env->getExtension("native_profiler");
        $__internal_8d10bfc15d7351452cec9a54737834a0f1249d885632a1a605306f9a11679e24->enter($__internal_8d10bfc15d7351452cec9a54737834a0f1249d885632a1a605306f9a11679e24_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"page-header\">
\t  <h1>Productos</h1>
\t</div>\t
\t<div class=\"row\">
\t\t<div class=\"col-lg-4 col-sm-4 col-xs-12\">
\t\t\t<div class=\"list-group\">
\t\t\t  <a href=\"#\" class=\"list-group-item active\">
\t\t\t    <h4 class=\"list-group-item-heading\">Tipo de Producto 1</h4>
\t\t\t    <p class=\"list-group-item-text\">Descripción del Producto.<br><small>Haga click para mostrar todos los productos de este tipo</small></p>
\t\t\t  </a>
\t\t\t  <a href=\"#\" class=\"list-group-item\">
\t\t\t    <h4 class=\"list-group-item-heading\">Tipo de Producto 2</h4>
\t\t\t    <p class=\"list-group-item-text\">Descripción del Producto. Haga click para mostrar todos los productos de este tipo.</p>
\t\t\t  </a>
\t\t\t  <a href=\"#\" class=\"list-group-item\">
\t\t\t    <h4 class=\"list-group-item-heading\">Tipo de Producto 2</h4>
\t\t\t    <p class=\"list-group-item-text\">Descripción del Producto. Haga click para mostrar todos los productos de este tipo.</p>
\t\t\t  </a>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-lg-8 col-sm-8 col-xs-12\">
\t\t\t<div class=\"row\">
\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t    <div class=\"thumbnail\">
\t\t\t      <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t      <div class=\"caption\">
\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t      </div>
\t\t\t    </div>
\t\t\t  </div>
\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t    <div class=\"thumbnail\">
\t\t\t      <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t      <div class=\"caption\">
\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t      </div>
\t\t\t    </div>
\t\t\t  </div>
\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t    <div class=\"thumbnail\">
\t\t\t      <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t      <div class=\"caption\">
\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t      </div>
\t\t\t    </div>
\t\t\t  </div>
\t\t\t\t<div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t\t    <div class=\"thumbnail\">
\t\t\t\t      <img src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t\t      <div class=\"caption\">
\t\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t\t    <div class=\"thumbnail\">
\t\t\t\t      <img src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t\t      <div class=\"caption\">
\t\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t\t    <div class=\"thumbnail\">
\t\t\t\t      <img src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t\t      <div class=\"caption\">
\t\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"col-lg-4 col-sm-6 col-xs-6\">
\t\t\t\t    <div class=\"thumbnail\">
\t\t\t\t      <img src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/jygrevestimientos/images/show.jpg"), "html", null, true);
        echo "\" alt=\"Prod1\">
\t\t\t\t      <div class=\"caption\">
\t\t\t\t        <h3>Nombre del Prod</h3>
\t\t\t\t        <p>Una descripción adecuada o una tabla con las caracteristicas</p>
\t\t\t\t        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Ver Más</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Ver Otros</a></p>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t</div>
\t</div>
";
        
        $__internal_8d10bfc15d7351452cec9a54737834a0f1249d885632a1a605306f9a11679e24->leave($__internal_8d10bfc15d7351452cec9a54737834a0f1249d885632a1a605306f9a11679e24_prof);

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
        return array (  157 => 90,  144 => 80,  131 => 70,  118 => 60,  105 => 50,  92 => 40,  79 => 30,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
