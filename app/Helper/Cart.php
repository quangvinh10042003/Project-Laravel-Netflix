<?php
    namespace App\Helper;
    use App\Models\Ticket;
    class Cart{
        public $items;
        public $totalQuantity = 0;

        public function __construct()
        {
            $this->items = session('cart') ? session('cart') : [];
            $this->totalQuantity = $this->setTotalQuantity();
        }
        public function create($ticket)
        {
          
            $this->items[] = (object) $ticket;
            session(['cart' => $this->items]);
        }
        public function delete($id)
        {
            if (isset($this->items[$id])) {
                unset($this->items[$id]);
                session(['cart' => $this->items]);
            }
        }
        public function clear()
        {
            session(['cart' => null]);
        }
    
        private function setTotalQuantity()
        {
            $totalQuantity = count($this->items);
            return $totalQuantity;
        }
    }
?>