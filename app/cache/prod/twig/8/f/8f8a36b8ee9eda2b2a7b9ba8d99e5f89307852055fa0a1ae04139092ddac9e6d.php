<?php

/* JYGRevestimientosBundle:Default:index.html.twig */
class __TwigTemplate_8f8a36b8ee9eda2b2a7b9ba8d99e5f89307852055fa0a1ae04139092ddac9e6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a0e78f7de836e632a4d9af458b11d339f91f631c301b1e11ee73c8ff62a3439f = $this->env->getExtension("native_profiler");
        $__internal_a0e78f7de836e632a4d9af458b11d339f91f631c301b1e11ee73c8ff62a3439f->enter($__internal_a0e78f7de836e632a4d9af458b11d339f91f631c301b1e11ee73c8ff62a3439f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Default:index.html.twig"));

        // line 1
        echo "Hellos ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!
";
        
        $__internal_a0e78f7de836e632a4d9af458b11d339f91f631c301b1e11ee73c8ff62a3439f->leave($__internal_a0e78f7de836e632a4d9af458b11d339f91f631c301b1e11ee73c8ff62a3439f_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
