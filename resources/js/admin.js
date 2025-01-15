/* ####################
    Category Loader
#################### */
document.addEventListener('DOMContentLoaded', function () {
    const categoryContainer = document.getElementById('category-container');
    
    // Initial categories are already passed into the first select
    const categorySelects = [];

    function createSelect(categoryData, parentSelect = null) {
        const selectId = `category_${categorySelects.length + 1}`;
        const newSelectDiv = document.createElement('div');
        newSelectDiv.id = `${selectId}_div`;

        const label = document.createElement('label');
        label.setAttribute('for', selectId);
        label.classList.add('block', 'text-lg', 'font-medium', 'text-gray-700');
        label.textContent = `Category ${categorySelects.length + 1}`;
        
        const select = document.createElement('select');
        select.id = selectId;
        select.name = selectId;
        select.classList.add('mt-1', 'block', 'w-full', 'px-4', 'py-2', 'border', 'border-gray-300', 'rounded-md', 'shadow-sm', 'focus:outline-none', 'focus:ring-2', 'focus:ring-indigo-500', 'focus:border-indigo-500');
        
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Select Subcategory';
        select.appendChild(defaultOption);

        // Populate the select with options based on category data
        categoryData.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id;
            option.textContent = category.name;
            select.appendChild(option);
        });

        select.addEventListener('change', function () {
            const selectedCategoryId = select.value;
            console.log(select.parentElement)
            if (selectedCategoryId) {
                // Fetch child categories if available
                fetchCategories(selectedCategoryId, select);
            } else {
                // If no category is selected, hide the next selects
                const nextSelectDiv = select.nextElementSibling;
                if (nextSelectDiv) {
                    nextSelectDiv.style.display = 'none';
                }
            }
        });

        newSelectDiv.appendChild(label);
        newSelectDiv.appendChild(select);

        if (parentSelect) {
            // If there's a parent select, append the new select under it
            parentSelect.parentElement.appendChild(newSelectDiv);
        } else {
            // Otherwise, it's the first select, so append it directly to the container
            categoryContainer.appendChild(newSelectDiv);
        }

        categorySelects.push(select);
    }

    // Fetch child categories from the server
    function fetchCategories(parentId, parentSelect) {
        fetch(`/admin/get-categories/${parentId}`)
            .then(response => response.json())
            .then(data => {
                /// Find the next select element
                const nextSelectDiv = parentSelect.parentElement;
                // Check if the nextSelectDiv exists before accessing it
                if (nextSelectDiv) {
                    console.log('Element', data)
                    if (data.length > 0) {
                        nextSelectDiv.style.display = 'block';
                        createSelect(data, parentSelect);
                    } else {
                        // nextSelectDiv.style.display = 'none';
                        // this is the end
                        parentSelect.name = 'category_id'
                    }
                }
            });
    }

    // Initial select creation
    document.getElementById('category_0').addEventListener('change', function () {
        const selectedCategoryId = this.value;
        if (selectedCategoryId) {
            fetchCategories(selectedCategoryId, this);
        }
    });
});

/* ######################
    Activation Toggle
###################### */
function activationToggle(e, form_id) {
    e.preventDefault();
    console.log(e);
    if(confirm('Confirm Change?')) {
        document.forms[`activationForm-${form_id}`].submit();
    }
}