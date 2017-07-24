<?php

class Brackets
{
    private function getPairBracket($bracket)
    {
        switch ($bracket) {
            case '(':
                return ')';
            case '[':
                return ']';
            case '{':
                return '}';
            case ')':
                return '(';
            case ']':
                return '[';
            case '}':
                return '{';
            default:
                break;
        }
    }

    public function isBracketSequenceCorrect($str)
    {
        $stack = new SplStack();
        $length = strlen($str);

        for ($i = 0; $i < $length; $i++) {
            switch ($str[$i]) {
                case '(':
                case '[':
                case '{':
                    $stack->push($str[$i]);
                    break;
                case ')':
                case ']':
                case '}':
                    if (!$stack->isEmpty() && $stack->top() == $this->getPairBracket($str[$i])) {
                        $stack->pop();
                    } else {
                        return false;
                    }
                    break;
                default:
                    return false;
                    break;
            }
        }

        if (!$stack->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }
}

?>