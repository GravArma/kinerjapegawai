<?php

namespace App;

class RandomForest
{
    protected $trees = [];
    protected $numTrees;

    public function __construct($numTrees)
    {
        $this->numTrees = $numTrees;
    }

    public function train($features, $targets)
    {
        for ($i = 0; $i < $this->numTrees; $i++) {
            // Create a bootstrap sample of the data
            $sample = $this->bootstrapSample($features, $targets);
            // Create and train a decision tree on the sample
            $tree = new DecisionTree();
            $tree->train($sample['features'], $sample['targets']);
            $this->trees[] = $tree;
        }
    }

    public function predict($features)
    {
        $predictions = [];
        foreach ($this->trees as $tree) {
            $predictions[] = $tree->predict($features);
        }
        return $this->majorityVote($predictions);
    }

    protected function bootstrapSample($features, $targets)
    {
        $sampleFeatures = [];
        $sampleTargets = [];
        $count = count($features);

        for ($i = 0; $i < $count; $i++) {
            $index = rand(0, $count - 1);
            $sampleFeatures[] = $features[$index];
            $sampleTargets[] = $targets[$index];
        }

        return ['features' => $sampleFeatures, 'targets' => $sampleTargets];
    }

    protected function majorityVote($predictions)
    {
        $counts = array_count_values($predictions);
        return array_search(max($counts), $counts);
    }
}

?>