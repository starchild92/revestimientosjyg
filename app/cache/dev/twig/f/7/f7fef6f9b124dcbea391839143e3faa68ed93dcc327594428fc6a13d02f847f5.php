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
        $__internal_75f1f811c3b6e9500bc2962d006d5fa8e589b59aa724e073e7d8277b5bb0b85b = $this->env->getExtension("native_profiler");
        $__internal_75f1f811c3b6e9500bc2962d006d5fa8e589b59aa724e073e7d8277b5bb0b85b->enter($__internal_75f1f811c3b6e9500bc2962d006d5fa8e589b59aa724e073e7d8277b5bb0b85b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:galeria.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_75f1f811c3b6e9500bc2962d006d5fa8e589b59aa724e073e7d8277b5bb0b85b->leave($__internal_75f1f811c3b6e9500bc2962d006d5fa8e589b59aa724e073e7d8277b5bb0b85b_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_2e153246f15249b12c643b22905bd27075a60471c04f98a3556e42d25c318f63 = $this->env->getExtension("native_profiler");
        $__internal_2e153246f15249b12c643b22905bd27075a60471c04f98a3556e42d25c318f63->enter($__internal_2e153246f15249b12c643b22905bd27075a60471c04f98a3556e42d25c318f63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Galería";
        
        $__internal_2e153246f15249b12c643b22905bd27075a60471c04f98a3556e42d25c318f63->leave($__internal_2e153246f15249b12c643b22905bd27075a60471c04f98a3556e42d25c318f63_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_f69cf1b0642990b3fec4c805aa4fdcde748ad53558fc4d48e50b9571118c03dd = $this->env->getExtension("native_profiler");
        $__internal_f69cf1b0642990b3fec4c805aa4fdcde748ad53558fc4d48e50b9571118c03dd->enter($__internal_f69cf1b0642990b3fec4c805aa4fdcde748ad53558fc4d48e50b9571118c03dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_f69cf1b0642990b3fec4c805aa4fdcde748ad53558fc4d48e50b9571118c03dd->leave($__internal_f69cf1b0642990b3fec4c805aa4fdcde748ad53558fc4d48e50b9571118c03dd_prof);

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
