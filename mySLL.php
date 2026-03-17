<?php
/**
 * Represents a single unit of data in the list.
 */
class Node 
{
    public $data;
    // The '?' allows this to be either a Node object OR null
    public Node $next=null;

    public function __construct(mixed $data) {
        $this->data = $data;
        $this->next = null;
    }
}

/**
 * Manages the collection of nodes.
 */
class SinglyLinkedList {
    private Node $head = null;

    /**
     * Insert at the beginning: O(1)
     */
    public function insertAtHead(mixed $data): void {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    /**
     * Traverse and print the list: O(n)
     */
    public function display(): void {
        $current = $this->head;
        while ($current !== null) {
            echo "[ " . $current->data . " ] -> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }
}

print("<h1><center><font face=arial>Welcome to Two Days Workshop on Web Technologies using PHP and Advance PHP</font></center></h1>");
print("<center><font face=arial>13-14 March 2026</font></center>");
print("<p align=center><table>");
print("</tr><td>Resource Person</td><td>Professor Pravin Yannawar</td><td></td><td>Professor Vikas Humbe</td></tr>");
print("</tr><td></td><td>Professor, Department of Computer Science and IT, <br>Dr. B A M University, Chhatrpati Sambhajinagar</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Associate Professor, School of Technology, <br>STRM University, Latur</td></tr>");
print("</table></p>");
print("<br><b> Working with Singly Linked List (SLL) </b><br>");
// Execution
$list = new SinglyLinkedList();
$list->insertAtHead("Action 1: Type 'Hello'");
$list->insertAtHead("Action 2: Delete 'o'");
$list->insertAtHead("Action 3: Bold Text");

$list->display();
print("<br>Please Click <a href=index.php>here</a> to move to source Page");
?>