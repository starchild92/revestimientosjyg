<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_0f9a855f67d25af6ba79ef22c28026a3265e73d8bf7b45ee82c62c2ef4c2fbd7 extends Twig_Template
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
        $__internal_340a46ea902b3dbd2f44fa4b7ccbf92a61d505fce9e9eddbab071f058f93de3f = $this->env->getExtension("native_profiler");
        $__internal_340a46ea902b3dbd2f44fa4b7ccbf92a61d505fce9e9eddbab071f058f93de3f->enter($__internal_340a46ea902b3dbd2f44fa4b7ccbf92a61d505fce9e9eddbab071f058f93de3f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_340a46ea902b3dbd2f44fa4b7ccbf92a61d505fce9e9eddbab071f058f93de3f->leave($__internal_340a46ea902b3dbd2f44fa4b7ccbf92a61d505fce9e9eddbab071f058f93de3f_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
