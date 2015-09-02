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
        $__internal_468c7cf63133a1b7e808c784ff2e6a0ba69ea357b17c9561fe04bbef1eb6eeef = $this->env->getExtension("native_profiler");
        $__internal_468c7cf63133a1b7e808c784ff2e6a0ba69ea357b17c9561fe04bbef1eb6eeef->enter($__internal_468c7cf63133a1b7e808c784ff2e6a0ba69ea357b17c9561fe04bbef1eb6eeef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_468c7cf63133a1b7e808c784ff2e6a0ba69ea357b17c9561fe04bbef1eb6eeef->leave($__internal_468c7cf63133a1b7e808c784ff2e6a0ba69ea357b17c9561fe04bbef1eb6eeef_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_45e3cd6f310bffbbbda6865151868031a6b473defcb68c84110da3ca1dcf7806 = $this->env->getExtension("native_profiler");
        $__internal_45e3cd6f310bffbbbda6865151868031a6b473defcb68c84110da3ca1dcf7806->enter($__internal_45e3cd6f310bffbbbda6865151868031a6b473defcb68c84110da3ca1dcf7806_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_45e3cd6f310bffbbbda6865151868031a6b473defcb68c84110da3ca1dcf7806->leave($__internal_45e3cd6f310bffbbbda6865151868031a6b473defcb68c84110da3ca1dcf7806_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_38a7f41f0837a02f2b9f0ebca5d40e176ecb155c3d09485009a38795ba8951cc = $this->env->getExtension("native_profiler");
        $__internal_38a7f41f0837a02f2b9f0ebca5d40e176ecb155c3d09485009a38795ba8951cc->enter($__internal_38a7f41f0837a02f2b9f0ebca5d40e176ecb155c3d09485009a38795ba8951cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "\t
\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_38a7f41f0837a02f2b9f0ebca5d40e176ecb155c3d09485009a38795ba8951cc->leave($__internal_38a7f41f0837a02f2b9f0ebca5d40e176ecb155c3d09485009a38795ba8951cc_prof);

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
