<?php

namespace App;

class DecisionTree
{
    protected $tree;

    public function train($features, $targets)
    {
        // Build the tree using the training data
        $this->tree = $this->buildTree($features, $targets);
    }

    public function predict($features)
    {
        // Traverse the tree to make a prediction
        return $this->traverseTree($this->tree, $features);
    }

    protected function buildTree($features, $targets)
    {
        // If all targets are the same, return that target
        if (count(array_unique($targets)) === 1) {
            return $targets[0];
        }

        // If no features left, return the most common target
        if (empty($features)) {
            return $this->mostCommonTarget($targets);
        }

        // Find the best feature to split on
        $bestFeatureIndex = $this->findBestFeature($features, $targets);
        $bestFeatureValues = array_unique(array_column($features, $bestFeatureIndex));

        $tree = [];
        foreach ($bestFeatureValues as $value) {
            $subFeatures = [];
            $subTargets = [];

            foreach ($features as $index => $feature) {
                if ($feature[$bestFeatureIndex] === $value) {
                    $subFeatures[] = array_diff_key($feature, [$bestFeatureIndex => '']);
                    $subTargets[] = $targets[$index];
                }
            }

            $tree[$value] = $this->buildTree($subFeatures, $subTargets);
        }

        return [$bestFeatureIndex => $tree];
    }

    protected function traverseTree($tree, $features)
    {
        $featureIndex = key($tree);
        $featureValue = $features[$featureIndex];

        if (isset($tree[$featureValue])) {
            $subTree = $tree[$featureValue];
            if (is_array($subTree)) {
                return $this->traverseTree($subTree, $features);
            } else {
                return $subTree; // Leaf node
            }
        }

        return null; // No prediction available
    }

    protected function mostCommonTarget($targets)
    {
        $counts = array_count_values($targets);
        arsort($counts);
        return key($counts);
    }

    protected function findBestFeature($features, $targets)
    {
        // Implement logic to find the best feature based on information gain or Gini impurity
        // Placeholder return value for the example
        return 0; // Return the index of the best feature
    }
}
