<?php
namespace Ovc\Customtags\Ui\Component\Listing\Column\Customtags;

class GridActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if(isset($item["tag_id"]))
                {
                    $id = $item["tag_id"];
                }
                $item[$name]["view"] = [
                    "href"=>$this->getContext()->getUrl(
                        "customtags/index/edit",["tag_id"=>$id]),
                    "label"=>__("Edit")
                ];
            }
        }

        return $dataSource;
    }    
    
}
