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
        $__internal_6e457ef6664f2d1c605ec2a6aceed6f84af3062efead6dde962070f4347ec270 = $this->env->getExtension("native_profiler");
        $__internal_6e457ef6664f2d1c605ec2a6aceed6f84af3062efead6dde962070f4347ec270->enter($__internal_6e457ef6664f2d1c605ec2a6aceed6f84af3062efead6dde962070f4347ec270_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6e457ef6664f2d1c605ec2a6aceed6f84af3062efead6dde962070f4347ec270->leave($__internal_6e457ef6664f2d1c605ec2a6aceed6f84af3062efead6dde962070f4347ec270_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_ecb9f863bf6299d39f841016df7f0cea220ab02fb37b6e78f5d5398678b4efb7 = $this->env->getExtension("native_profiler");
        $__internal_ecb9f863bf6299d39f841016df7f0cea220ab02fb37b6e78f5d5398678b4efb7->enter($__internal_ecb9f863bf6299d39f841016df7f0cea220ab02fb37b6e78f5d5398678b4efb7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_ecb9f863bf6299d39f841016df7f0cea220ab02fb37b6e78f5d5398678b4efb7->leave($__internal_ecb9f863bf6299d39f841016df7f0cea220ab02fb37b6e78f5d5398678b4efb7_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_e8188e427dc04c5ff72090efd479c366599cb0b6ea8a19bf68ed565208cf2e1b = $this->env->getExtension("native_profiler");
        $__internal_e8188e427dc04c5ff72090efd479c366599cb0b6ea8a19bf68ed565208cf2e1b->enter($__internal_e8188e427dc04c5ff72090efd479c366599cb0b6ea8a19bf68ed565208cf2e1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "\t
\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_e8188e427dc04c5ff72090efd479c366599cb0b6ea8a19bf68ed565208cf2e1b->leave($__internal_e8188e427dc04c5ff72090efd479c366599cb0b6ea8a19bf68ed565208cf2e1b_prof);

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
