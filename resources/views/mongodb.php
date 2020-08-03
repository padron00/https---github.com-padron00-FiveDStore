<?php

//collection = (new MongoDB\Client )->FiveCStore->Users;
//
//cursor = $collection->find(
//   [],
//   [
//       'limit' => 5,
//       'sort' => ['pop' => -1],
//   ]
//;
//
/// print_r($cursor);
//foreach ($cursor as $document) {
//   print_r($document);
// }

// Create Functions

use MongoDB\Operation\UpdateOne;

$collection = (new MongoDB\Client)->FiveDStore->Categories;
// 
// $insertResult = $collection->insertOne([
//     "category" => "Cellphpnes",
//     "description" => "Phones for the on the go use."
// ]);
// 
// printf("Inserted %d document(s)\n", $insertResult->getInsertedCount());
// var_dump($insertResult->getInsertedID());

//Read Functions
$table = $collection->find();

foreach ($table as $record) {
    echo "<br />";
    echo "ID: ".$record["_id"]."<br >";
    echo "Category:".$record->category."<br />";
    echo "Description:".$record["description"]."<br />";
}

//Update Functions
//
//$updateOneResult = $collection->updateOne([
// "category" => "Cellphones"
//],[
//    '$set' => ["description" => "Mobile Phones"]
//]);
//
//printf("Matched %d Document(s)<br />", $updateOneResult->getMatchedCount());
//printf("Updated %d Document(s)<br />", $updateOneResult->getModifiedCount());

//Delete  Functions
$deleteResult = $collection->deleteOne([
    "category" => "Cellphones"
]);

printf("Deleted %d document(s)<br />", $deleteResult->getDeletedCount());

  $collection = (new MongoDB\Client)->FiveDStore->Products;
   //$id = "5ee2303a3fe2b512c01af536";
   $product = $collection->findOne();
//$product = $collection->find();

  var_dump($product);
  print_r($product);