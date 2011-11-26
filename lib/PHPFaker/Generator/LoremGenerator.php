<?php
/**
 * Lorem Class
 *
 * @package PHPFaker
 * @version 0.1.0
 * @copyright 2011 Pavel Gopanenko
 * @author Pavel Gopanenko
 * @author Caius Durling
 * @license MIT Licence
 * @link https://github.com/Itart/php-faker
 */
namespace PHPFaker\Generator;

/**
 * Class generate lorem data.
 *
 * @package PHPFaker
 * @subpackage Generator
 */
class LoremGenerator extends AbstractGenerator
{
    private static function getWordList()
    {
        return array("alias", "consequatur", "aut", "perferendis", "sit", "voluptatem", "accusantium", "doloremque", "aperiam", "eaque", "ipsa", "quae", "ab", "illo", "inventore", "veritatis", "et", "quasi", "architecto", "beatae", "vitae", "dicta", "sunt", "explicabo", "aspernatur", "aut", "odit", "aut", "fugit", "sed", "quia", "consequuntur", "magni", "dolores", "eos", "qui", "ratione", "voluptatem", "sequi", "nesciunt", "neque", "dolorem", "ipsum", "quia", "dolor", "sit", "amet", "consectetur", "adipisci", "velit", "sed", "quia", "non", "numquam", "eius", "modi", "tempora", "incidunt", "ut", "labore", "et", "dolore", "magnam", "aliquam", "quaerat", "voluptatem", "ut", "enim", "ad", "minima", "veniam", "quis", "nostrum", "exercitationem", "ullam", "corporis", "nemo", "enim", "ipsam", "voluptatem", "quia", "voluptas", "sit", "suscipit", "laboriosam", "nisi", "ut", "aliquid", "ex", "ea", "commodi", "consequatur", "quis", "autem", "vel", "eum", "iure", "reprehenderit", "qui", "in", "ea", "voluptate", "velit", "esse", "quam", "nihil", "molestiae", "et", "iusto", "odio", "dignissimos", "ducimus", "qui", "blanditiis", "praesentium", "laudantium", "totam", "rem", "voluptatum", "deleniti", "atque", "corrupti", "quos", "dolores", "et", "quas", "molestias", "excepturi", "sint", "occaecati", "cupiditate", "non", "provident", "sed", "ut", "perspiciatis", "unde", "omnis", "iste", "natus", "error", "similique", "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollitia", "animi", "id", "est", "laborum", "et", "dolorum", "fuga", "et", "harum", "quidem", "rerum", "facilis", "est", "et", "expedita", "distinctio", "nam", "libero", "tempore", "cum", "soluta", "nobis", "est", "eligendi", "optio", "cumque", "nihil", "impedit", "quo", "porro", "quisquam", "est", "qui", "minus", "id", "quod", "maxime", "placeat", "facere", "possimus", "omnis", "voluptas", "assumenda", "est", "omnis", "dolor", "repellendus", "temporibus", "autem", "quibusdam", "et", "aut", "consequatur", "vel", "illum", "qui", "dolorem", "eum", "fugiat", "quo", "voluptas", "nulla", "pariatur", "at", "vero", "eos", "et", "accusamus", "officiis", "debitis", "aut", "rerum", "necessitatibus", "saepe", "eveniet", "ut", "et", "voluptates", "repudiandae", "sint", "et", "molestiae", "non", "recusandae", "itaque", "earum", "rerum", "hic", "tenetur", "a", "sapiente", "delectus", "ut", "aut", "reiciendis", "voluptatibus", "maiores", "doloribus", "asperiores", "repellat");
    }
    
    public function getName()
    {
        return 'lorem';
    }
    
    /**
     * Generate an array of random words
     *
     * @param string $num how many words to return
     * @return array
     * @author Caius Durling
     */
    public function words($num = 3)
    {
        $w = self::getWordList();
        shuffle($w);
        return array_slice($w, 0, $num);
    }

    /**
     * Generate a random sentence
     *
     * @param string $word_count around how many words the sentence should contain
     * @return string
     * @author Caius Durling
     */
    public function sentence($wordCount = 4)
    {
        $words = $this->words($wordCount + rand(0, 4));
        $words[0] = ucwords($words[0]);
        return join($words, ' ') . '.';
    }

    /**
     * Generate an array of sentences
     *
     * @param string $sentence_count around how many sentences to generate
     * @return array
     * @author Caius Durling
     */
    public function sentences($sentenceCount = 3)
    {
        $c = $sentenceCount + rand(0, 3);
        for ($i = 0; $i < $c; $i++) {
            $s[] = $this->sentence;
        }
        return $s;
    }

    /**
     * Generate a single paragraph
     *
     * @param string $sentence_count around how many sentences the paragraph should contain
     * @return string
     * @author Caius Durling
     */
    public function paragraph($sentenceCount = 3)
    {
        return join($this->sentences($sentenceCount + rand(0, 3)), " ");
    }

    /**
     * Generate an array of paragraphs
     *
     * @param string $paragraph_count how many paragraphs to return
     * @return array
     * @author Caius Durling
     */
    public function paragraphs($paragraphCount = 3)
    {
        for ($i = 0; $i < $paragraphCount; $i++) {
            $p[] = $this->paragraph;
        }
        return $p;
    }
}
