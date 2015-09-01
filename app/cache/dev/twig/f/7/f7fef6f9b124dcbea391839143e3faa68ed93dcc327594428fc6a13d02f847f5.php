<?php

/* JYGRevestimientosBundle:Page:galeria.html.twig */
class __TwigTemplate_f7fef6f9b124dcbea391839143e3faa68ed93dcc327594428fc6a13d02f847f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:galeria.html.twig", 1);
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
        $__internal_c3a2954d1a254c9f4d8f0a10d476356aa893e264e3495b92c27b6694079d1caa = $this->env->getExtension("native_profiler");
        $__internal_c3a2954d1a254c9f4d8f0a10d476356aa893e264e3495b92c27b6694079d1caa->enter($__internal_c3a2954d1a254c9f4d8f0a10d476356aa893e264e3495b92c27b6694079d1caa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:galeria.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c3a2954d1a254c9f4d8f0a10d476356aa893e264e3495b92c27b6694079d1caa->leave($__internal_c3a2954d1a254c9f4d8f0a10d476356aa893e264e3495b92c27b6694079d1caa_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_504acba1960b2d38e728de4d1e821b1ac0629d3a158ef7be173f9fdaeca8b7c9 = $this->env->getExtension("native_profiler");
        $__internal_504acba1960b2d38e728de4d1e821b1ac0629d3a158ef7be173f9fdaeca8b7c9->enter($__internal_504acba1960b2d38e728de4d1e821b1ac0629d3a158ef7be173f9fdaeca8b7c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Galería";
        
        $__internal_504acba1960b2d38e728de4d1e821b1ac0629d3a158ef7be173f9fdaeca8b7c9->leave($__internal_504acba1960b2d38e728de4d1e821b1ac0629d3a158ef7be173f9fdaeca8b7c9_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_2d26e617f3e47d1241d09ebee87dd9ff2bb76005519c5f9f6a8d566b6fd8be98 = $this->env->getExtension("native_profiler");
        $__internal_2d26e617f3e47d1241d09ebee87dd9ff2bb76005519c5f9f6a8d566b6fd8be98->enter($__internal_2d26e617f3e47d1241d09ebee87dd9ff2bb76005519c5f9f6a8d566b6fd8be98_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_2d26e617f3e47d1241d09ebee87dd9ff2bb76005519c5f9f6a8d566b6fd8be98->leave($__internal_2d26e617f3e47d1241d09ebee87dd9ff2bb76005519c5f9f6a8d566b6fd8be98_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:galeria.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
